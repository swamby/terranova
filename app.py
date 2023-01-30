from flask import Flask, render_template, request
from newsapi import NewsApiClient

app = Flask(__name__)
newsapi = NewsApiClient(api_key='e3a56dec62e7409683a14531a9dae0cc')

@app.route('/',
endpoint='home')
def home():
    top_headlines = newsapi.get_top_headlines(
                                          language='it',
                                          country='it')
    return render_template('index.html', top_headlines=top_headlines)

@app.route('/sport',
endpoint='sport')
def sport():
    newssport = newsapi.get_top_headlines(
                                    language='it',
                                    country='it',
                                    category='sports')
    return render_template('sport.html', newssport=newssport)

@app.route('/business',
endpoint='business')
def buisness():
    newsbusiness = newsapi.get_top_headlines(
                                    language='it',
                                    country='it',
                                    category='business')
    return render_template('business.html', newsbusiness=newsbusiness)

@app.route('/intrattenimento',
endpoint='intrattenimento')
def intrattenimento():
    newsintrattenimento = newsapi.get_top_headlines(
                                    language='it',
                                    country='it',
                                    category='entertainment')
    return render_template('intrattenimento.html', newsintrattenimento=newsintrattenimento)

@app.route('/scienza',
endpoint='scienza')
def scienza():
    newsscienza = newsapi.get_top_headlines(
                                    language='it',
                                    country='it',
                                    category='science')
    return render_template('scienza.html', newsscienza=newsscienza)

@app.route("/search", methods=["POST"])
def search():
    q = request.form['search']
    searchnews = newsapi.get_everything(
                                            language='it',
                                            q=q)
    return render_template('search.html', searchnews=searchnews)

@app.route("/prova", methods=["GET"])
def prova():
    category = request.args.get('prova')
    prova = newsapi.get_top_headlines(category=category,language='it')
    return render_template('prova.html',prova=prova)
