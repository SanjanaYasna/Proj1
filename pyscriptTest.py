def my_function(*args, **kwargs):
    text = Element('test-input').element.value
    text = str(text)
    if text == "4":
        Element('test-output').element.innerText = text
    else:
        Element('test-output').element.innerText = "Nope"
        

