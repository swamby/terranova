from flask import Flask, render_template, request, session, redirect
from newsapi import NewsApiClient
from flask_session import Session
from supabase.client import create_client, Client
from gotrue import errors
import json
from datetime import datetime
from flask import request
import flask
from flask import jsonify
from postgrest import exceptions


url = "https://dmpnlikecszpokaxruat.supabase.co"
key = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImRtcG5saWtlY3N6cG9rYXhydWF0Iiwicm9sZSI6ImFub24iLCJpYXQiOjE2NzU1MTAzNTksImV4cCI6MTk5MTA4NjM1OX0.Tfvu7UnKXYZJHCGa9VAzkygXz1-pD9pF-9Tj1f1yUio"
supabase: Client = create_client(url, key)
app = Flask(__name__)
app.config["SESSION_PERMANENT"] = False
app.config["SESSION_TYPE"] = "filesystem"
@app.template_filter() 
def format_datetime(value):
    return datetime.strptime(value, "%Y-%m-%dT%H:%M:%SZ").strftime("%d %B %Y")
Session(app)
newsapi = NewsApiClient(api_key='0e1d0f310d794ee283e3b4c59ac1b365')

@app.route('/',
endpoint='home')
def home():
    session['email']=session.get('email')
    top_headlines = newsapi.get_everything(q="ita",language="it")
    locali = newsapi.get_everything(q='grosseto',language="it")
    sport = newsapi.get_everything(q="Serie A calcio",language="it")
    if session['email'] is not None or session['email']!='':
        return render_template('index.html', top_headlines=top_headlines,locali=locali,sport=sport,email=session['email'])
    else:
        return render_template('index.html', top_headlines=top_headlines,locali=locali,sport=sport)

@app.route("/search", methods=["POST","GET"])
def search():
    e = None
    q = request.form.get('search')
    print (q)
    searchnews = newsapi.get_everything(language='it',
                                        q=f'{q}')
    print (type(searchnews))
    print (searchnews)
    if searchnews["totalResults"] == 0:
        e = "Nessuna notizia trovata"
    return render_template('search.html', searchnews=searchnews,email=session['email'],e=e)

@app.route("/category", methods=["GET"])
def category():
    category = request.args.get('category')
    categorynews = newsapi.get_top_headlines(category=category,language="en")
    return render_template('category.html',categorynews=categorynews,email=session['email'])

@app.route("/account")
def account():
    name = request.args.get('name')
    if session.get('email') is None and name=="signup":
        return render_template('register.html')
    elif session.get('email') is None and name=="signin":
        return render_template('login.html')
    elif session.get('email') is not None:
        r = isAdmin()
        return render_template('account.html',account=session.get('email'),r=r)
    elif name=="confirm":
        return render_template('login.html')
    e="Effettua il login dalla homepage del sito, ci scusiamo per l'inconveniente"
    return render_template('error.html',e=e)

@app.route("/register")
def register():
    if session.get('username') is None:
        return render_template('register.html')

@app.route('/signup', methods=['GET', "POST"])
def signup():
    em = request.form.get('email')
    pss = request.form.get('password')
    print(em,pss)
    try:
        supabase.auth.sign_up(
            credentials={
                "email": em, 
                "password": pss
            }
        )
    except ValueError as e:
        print('Something went wrong')
        return render_template('index.html')
    return render_template('confirm.html')

@app.route("/logout")
def logout():
    session['email']=None
    supabase.auth.sign_out()
    return redirect('/')

@app.route("/signin", methods=['GET', "POST"])
def signin():
    em = request.form.get('email')
    pss = request.form.get('password')
    error = 0
    try:
        user_session = supabase.auth.sign_in_with_password(
            credentials={
                "email": em, 
                "password": pss
            }
        )
    except ValueError as e:
        print('Something went wrong')
        return render_template('login.html')
    except errors.AuthInvalidCredentialsError as e:
        print('Hai sbagliato password o nome utente')
        error = "Email o password errati"
        return render_template('login.html',error=error)
    except errors.AuthApiError as e:
        error = "Email o password errati"
        return render_template('login.html',error=error)
    if error:
        error = "Email o password errati"
        return render_template('login.html',error=error)
    else:        
        session['email'] = request.form.get('email')
        return redirect('/')

@app.route('/save', methods=['GET'])
def save():
    if session['email'] is None or session['email']=='':
        return render_template('error.html',e="Devi essere loggato per poter salvare le notizie!")
    title = request.args.get('title')
    desc = request.args.get('description')
    url = request.args.get('url')
    urlToImage = request.args.get('urlToImage')
    datetime = request.args.get('publishedAt')
    data = {
        'title' : title,
        'desc' : desc,
        'url' : url,
        'urlToImage' : urlToImage,
        'datetime' : datetime,
        'email' : session['email']
    }
    print (data)
    supabase.table('saved').insert(data).execute()
    return redirect('/')

@app.route('/saved')
def saved():
    saved_titles = supabase.table('saved').select('*').eq('email', session['email']).execute()
    data = saved_titles.data
    print(f'\n\n\n\nDATA: {data}\n\n\n\n')
    news = { 'articles' : [] }
    for saved in data:
        print(f'\n\n\n\nSAVED: {saved}\n\n\n\n')
        saved_json = {
            'id' : saved['id'],
            'title': saved['title'],
            'description': saved['desc'],
            'publishedAt' : saved['datetime'],
            'url' : saved['url'],
            'urlToImage' : saved['urlToImage']
        }
        news['articles'].append(saved_json)
    return render_template('saved.html',saved=news)

@app.route('/contatto', methods=['POST','GET'])
def contatto():
    if flask.request.method == 'POST':
        #handle post method
        return redirect('/')
    else:
        return render_template('contatto.html')

@app.route('/heads')
def heads():
    ansa = newsapi.get_everything(sources="ansa")
    repubblica = newsapi.get_everything(sources="la-repubblica")
    ilsole = newsapi.get_everything(sources="il-sole-24-ore")
    gnitalia = newsapi.get_everything(sources="google-news-it",language="it")
    estero = newsapi.get_everything(q="USA",language="it")
    print("ANSA",ansa)
    print("ANSA",repubblica)
    print("ANSA",ilsole)
    print("ANSA",gnitalia)
    print("ANSA",estero)
    return render_template('testate.html',ansa=ansa,repubblica=repubblica,ilsole=ilsole,gnitalia=gnitalia,estero=estero)

def isAdmin():
    query = supabase.table('admin').select('is_admin').eq('email', session['email']).execute()
    data = query.data
    try:
        if data[0]['is_admin'] == 1:
            r=1
            return r
        elif data[0]['is_admin'] == 0:
            r=0
            return r
    except (KeyError, IndexError):
        r=2
        return r

@app.route('/manage')
def manage():
    own_articles = supabase.table('ourarticles').select('*').execute()
    data = own_articles.data
    news = { 'articles' : [] }
    for ourarticles in data:
        print(f'\n\n\n\nSAVED: {saved}\n\n\n\n')
        ourarticles_json = {
            'id' : ourarticles['id'],
            'title': ourarticles['title'],
            'description': ourarticles['desc'],
            'publishedAt' : ourarticles['datetime'],
            'url' : ourarticles['url'],
            'urlToImage' : ourarticles['urlToImage']
        }
        news['articles'].append(ourarticles_json)
    print (news)
    return render_template('manage.html',ourarticles=news)

@app.route('/ournews')
def ournews():
    own_articles = supabase.table('ourarticles').select('*').execute()
    data = own_articles.data
    news = { 'articles' : [] }
    for ourarticles in data:
        print(f'\n\n\n\nSAVED: {saved}\n\n\n\n')
        ourarticles_json = {
            'id' : ourarticles['id'],
            'title': ourarticles['title'],
            'description': ourarticles['desc'],
            'publishedAt' : ourarticles['datetime'],
            'url' : ourarticles['url'],
            'urlToImage' : ourarticles['urlToImage']
        }
        news['articles'].append(ourarticles_json)
    print (news)
    return render_template('nostriarticoli.html',ourarticles=news)

@app.route('/delete', methods=["GET"])
def delete():
    id = request.args.get('id')
    delete = supabase.table('ourarticles').delete().eq('id',id).execute()
    print ("\n\n\n\n\n",type(delete))
    print("\n\n\n\n",delete,"\n\n\n\n")
    
    try: 
        delete = supabase.table('ourarticles').delete().eq('id',id).execute()
    except exceptions.APIError:
        m="Si è verificato un problema, riprova o contatta il gestore del sito"
        return render_template('delete.html',m=m)

    m="Notizia eliminata con successo"
    return render_template('delete.html',m=m)

@app.route('/formadd')
def formadd():
    return render_template('addnews.html')

@app.route('/add',methods=['POST'])
def add():
    title = request.form.get('title')
    desc = request.form.get('desc')
    url = request.form.get('url')
    urlToImage = request.form.get('urlToImage')
    datetime = request.form.get('datetime')
    print('\n\n\n\n',title,desc,url,urlToImage,datetime,'\n\n\n\n')
    data = {
        'title' : title,
        'desc' : desc,
        'url' : url,
        'urlToImage' : urlToImage,
        'datetime' : datetime
    }
    print (data)
    supabase.table('ourarticles').insert(data).execute()
    return redirect('/manage')

@app.route('/formedit')
def formedit():
    id = request.args.get('id')
    title = request.args.get('title')
    desc = request.args.get('description')
    url = request.args.get('url')
    urlToImage = request.args.get('urlToImage')
    datetime = request.args.get('publishedAt')
    return render_template('formedit.html',title=title,desc=desc,id=id,url=url,urlToImage=urlToImage,datetime=datetime)

@app.route('/edit',methods=['POST'])
def edit():
    id = request.form.get('id')
    title = request.form.get('title')
    desc = request.form.get('desc')
    url = request.form.get('url')
    urlToImage = request.form.get('urlToImage')
    datetime = request.form.get('datetime')
    insert = {
        'title' : title,
        'desc' : desc,
        'datetime' : datetime,
        'url' : url,
        'urlToImage' : urlToImage
    }
    print('\n\n\n\n\n',id,insert,'\n\n\n\n\n')
    try: 
        response = supabase.table('ourarticles').update(insert).eq('id', id).execute()
    except exceptions.APIError:
        m="Si è verificato un problema, riprova o contatta il gestore del sito"
        return render_template('error.html',e=m)

    m="Notizia eliminata con successo"
    return redirect('/manage')