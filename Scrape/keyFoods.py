#from js import document 

'''def __init__(self):
    self.query = Element("key_Foods_Search").element.value'''
def find(*args, **kwargs):
    query = Element('key_Foods_Search').element.value
    query = str(query)
    Element('test-output').element.innerText = query
        
            

    #Element("key_Foods_Search").element.oninput = food_display_handler