from flask import Flask, render_template, request
from newsapi import NewsApiClient

app = Flask(__name__)
newsapi = NewsApiClient(api_key='e3a56dec62e7409683a14531a9dae0cc')

@app.route('/')
def home():
    top_headlines = newsapi.get_top_headlines(
                                          language='it',
                                          country='it')
    return render_template('index.html', top_headlines=top_headlines)