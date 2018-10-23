from django.shortcuts import render, redirect
#importamos la mensajeria de django para utilizarla
from django.contrib import messages
# Create your views here.
from django.contrib.auth.decorators import login_required

def home(request):
    return render(request, 'core/home.html')

def registro(request):
    return render(request, 'core/registro.html')
