from django.shortcuts import render, redirect
#from django.contrib.auth.forms import UserCreationForm
from django.contrib import messages
from mainapp.forms import RegisterForm
from django.contrib.auth import authenticate, login, logout
from django.contrib.auth.decorators import login_required

def index(requets):
    return render(requets, 'mainapp/index.html', {
        'title': 'Inicio',
        'content': '..:: Esta es mi Pagina de Inicio ::..'
    })

@login_required(login_url='inicio')
def about(requets):
    return render(requets, 'mainapp/about.html', {
        'title': 'Acerca de',
        'content': 'este es el acerca de'
    })

@login_required(login_url='inicio')
def mision(requets):
    return render(requets, 'mainapp/mision.html', {
        'title': 'Mision',
    })

@login_required(login_url='inicio')
def vision(requets):
    return render(requets, 'mainapp/vision.html', {
        'title':'Vision'
    })


def register_user(requets):
    if requets.user.is_authenticated:
        return redirect('inicio')
    else:
        register_form=RegisterForm()

        if requets.method == "POST":
            register_form=RegisterForm(requets.POST)

            if register_form.is_valid():
               register_form.save()
               messages.success(requets,"¡Registro Éxitoso")
               return redirect('inicio')

        return render(requets,'users/register.html',{
        'title':'Registro de Usuario',
        'register_form':register_form,
        })

def login_user(requets):
    if requets.user.is_authenticated:
        return redirect('inicio')
    
    else: 
        if requets.method == "POST":
            username=requets.POST.get('username')
            password=requets.POST.get('password')

            user=authenticate(requets,username=username,password=password)

            if user is not None:
                login(requets,user)
                messages.success(requets, "¡Bienvenido al inicio de sesion!")
                return redirect('inicio')
            else:
                messages.warning(requets, "Usuario y/o Contraseña incorrectos")
    
    return render(requets, 'users/login.html', {
        'title':'Inicio de Sesion',
        'content':'Formulario de Inicio de Sesion'

    })

def logout_user(requets):
    logout(requets)
    return redirect('inicio')

#Redirigir primer forma
def error404(requets, exception):
    return redirect('inicio')

#Redirigir segunda forma

def error404_2(requets, exception):
    return render(requets, 'mainapp/404.html')
