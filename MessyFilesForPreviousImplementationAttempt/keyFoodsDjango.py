import requests
from bs4 import BeautifulSoup
from django import forms
from django.http import HttpResponse
from django.template import loader,Context, Template
from django.shortcuts import render, render_to_response
class Find(forms.Form):
    def find(request):
        if request == "POST":
            query = request.POST.get("search")
            print(request.POST)
            URL = "https://www.keyfood.com/store/keyFood/en/search/?text=" + query
            page = requests.get(URL)
            #Maybe not add set for other ones, where same names but different prices exist. Here, we only care about brand
            productOutput = set()
            soup = BeautifulSoup(page.content, "html.parser")
            productName = "product__list--name h-reset"
            count = 0
            #get set of 8 unique results
            for product in soup.find_all('h3', class_ = productName, limit = 8):
                if count == 8: 
                    break
                product = str(product)
                product = product.replace('<h3 class="product__list--name h-reset">', '')
                product = product.replace('</h3>', '')
                productOutput.add(product)
                count = len(productOutput)
            context = {
                productOne: productOutput[1]
            }
            template = loader.get_template("keyFoodsScrape.html")
            return render(request, "keyFoodsScrape.html", {"productOne": chips})

        #print(soup)

#query = "kittens"
#find(query)