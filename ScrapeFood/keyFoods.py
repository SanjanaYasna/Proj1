import requests
from bs4 import BeautifulSoup

URL = "https://www.keyfood.com/store/keyFood/en/search/?text=kittens"
page = requests.get(URL)

#Maybe not add set for other ones, where same names but different prices exist. Here, we only care about brand
productOutput = set()
soup = BeautifulSoup(page.content, "html.parser")
topSection = "product__list--name h-reset"
count = 0
'''resProducts = soup.find_all('h3', class_ = topSection, limit = 8)
for product in resProducts:
    product = str(product)
    product = product.replace('<h3 class="product__list--name h-reset">', '')
    product = product.replace('</h3>', '')
    productOutput.add(product)'''

for product in soup.find_all('h3', class_ = topSection, limit = 8):
    if count == 8: 
        break
    product = str(product)
    product = product.replace('<h3 class="product__list--name h-reset">', '')
    product = product.replace('</h3>', '')
    productOutput.add(product)
    count = len(productOutput)
print(productOutput)

#print(soup)