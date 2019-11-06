import {Routes, RouterModule} from '@angular/router';
import { FormularioClienteComponent } from 'src/app/View/formulario-cliente/formulario-cliente.component';
import { HomeComponent } from 'src/app/View/home/home.component';
import { ModuleWithProviders } from '@angular/compiler/src/core';
import { OrdemServicoComponent } from 'src/app/View/ordem-servico/ordem-servico.component';


const APP_Routes: Routes=[
 //caminho
    {
        path: '', component:HomeComponent
    },
    {
        path: 'formulario-cliente', component:FormularioClienteComponent
    },
    {
        path: 'ordem-servico', component:OrdemServicoComponent
    }
    ];

export const routing: ModuleWithProviders = RouterModule.forRoot(APP_Routes);