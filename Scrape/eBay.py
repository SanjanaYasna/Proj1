import requests
from bs4 import BeautifulSoup

from django import forms
class Find(forms.Form):
    def getQuery(request):
        query = request.POST.get("")
    query = "women's cleats" #make query serach bar input
    productDictionary = {}
    def find(query):
        URL = "https://www.ebay.com/sch/i.html?_from=R40&_trksid=p4432023.m570.l1313&_nkw=" + query + "&_sacat=0"
        page = requests.get(URL)
        productOutput = []
        soup = BeautifulSoup(page.content, "html.parser")
        count = 0
        for item in soup.find_all("div", class_="s-item__info clearfix")[1:]:
            if count == 8:
                break
            productDictionary.update({item.find("span", {'role': 'heading'}).get_text():item.find('span', class_ = "s-item__price").get_text()})
            #print(item.find('span', class_ = "s-item__price").get_text())
            count += 1
    #name of item: after _nkw, before & symbol
    #if name has 's, 's -> %27s%20
    find(query)

    '''print(productDictionary)

    import keyword
    #isKeyword function:
    tShirt = "Ralph lauren T-shirt"
    for i in productDictionary:
        if tShirt.iskeyword(productDictionary[0]):
            print(productDictionary[0])'''




