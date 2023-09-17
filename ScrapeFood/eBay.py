import requests
from bs4 import BeautifulSoup

URL = "https://www.ebay.com/sch/i.html?_from=R40&_trksid=p4432023.m570.l1313&_nkw=muffins&_sacat=0"
page = requests.get(URL)

#name of item: after _nkw, before & symbol
#if name has 's, 's -> %27s%20
productDictionary = {}
productOutput = []
soup = BeautifulSoup(page.content, "html.parser")
count = 0
for item in soup.find_all("div", class_="s-item__info clearfix")[1:]:
    if count == 8:
        break
    productDictionary.update({item.find("span", {'role': 'heading'}).get_text():item.find('span', class_ = "s-item__price").get_text()})
    #print(item.find('span', class_ = "s-item__price").get_text())
    count += 1

for i in productDictionary:
    print(i)
print(productDictionary)

