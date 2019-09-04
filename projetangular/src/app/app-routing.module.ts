import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { LoginComponent } from './login/login.component';
import { RegisterComponent } from './register/register.component';
import { HomeComponent } from './home/home.component';
import { PartenaireComponent } from './partenaire/partenaire/partenaire.component';
import { PartenairelistComponent } from './partenaire/partenairelist/partenairelist.component';


const routes: Routes = [

  { path: 'login', component: LoginComponent },
  { path: 'listepartenaires', component: PartenairelistComponent },
  { path: 'partenaires', component: PartenaireComponent },
  //{ path: '', component: HomeComponent },
  { path: 'register', component: RegisterComponent },
  { path: '', redirectTo: 'login', pathMatch: 'full' },
  { path: '**', redirectTo: 'login' }

];


@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
