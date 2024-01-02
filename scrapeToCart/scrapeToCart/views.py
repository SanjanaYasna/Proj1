from django.shortcuts import render, redirect
from django.template import loader, Template, Context
from django.http import Http404, HttpRequest, HttpResponse
from django.views.decorators.csrf import csrf_protect
from django.views.decorators.csrf import csrf_exempt

def tempMain(request):
    template = loader.get_template('dashboard.html')
    return HttpResponse(template.render())

#should take in store name too
def keyFoodsDashboard(request, store):
    print(store)
    if (store == "key-foods"):
        return render(request, 'keyFoodsScrape.php', {'store': "Key Foods"})
    if (store == 'ebay'):
        return render(request, 'keyFoodsScrape.php', {'store': "Ebay"})
    raise Http404

#so far for keyFoods
#if you switch a store, should take switch as context (Eg Ebay Responsive Results Table title, should call right search script )
@csrf_protect
def render_table(request):
    if request.method == "POST":
        query = request.POST['inputKeyFoods']
        print('recieved')
        return render(request, 'keyFoodsScrape.php', {'ifQuery' : query})
        #check for name value
    else :
        return render(request,'keyFoodsScrape.php', {})

def redirect_dashboard(request):
    if request == "/dashboard":
        response = redirect('/dashboard.html')
    else : response = redirect('scrapeToCart/scrapeToCart/dashboard.html') #redirect(Http404)
    return response
