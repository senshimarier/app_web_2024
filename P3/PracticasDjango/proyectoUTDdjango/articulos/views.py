from django.shortcuts import render
from django.contrib.auth.decorators import login_required
from articulos.models import Article, Category

# Create your views here.
@login_required(login_url='inicio')
def list_art(requets):
    
    #Sacar Articulos de la base de datos
    articulos = Article.objects.all()
    
    
    return render(requets, 'articulos/listado_art.html', {
        'title':'Articulos',
        'content':'Listado de Articulos',
        'articulos':articulos
    })

@login_required(login_url='inicio')
def list_cat(requets):
    
    categorias = Category.objects.all()
    
    return render(requets, 'categorias/listado_cat.html', {
        'title':'Categorias',
        'content':'Listado de Categorias',
        'categorias':categorias
    })