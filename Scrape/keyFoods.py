#!/usr/bin/env python3
from bs4 import BeautifulSoup
import sys
query = sys.argv[1]
URL = "https://www.keyfood.com/store/keyFood/en/search/?text=" + query
page = requests.get(URL)
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
        
        
  