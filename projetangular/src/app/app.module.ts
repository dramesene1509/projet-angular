import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms'
import { HttpClientModule } from '@angular/common/http';
import { CommonModule } from '@angular/common';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { NavComponent } from './nav/nav.component';
import { LoginComponent } from './login/login.component';
import { RegisterComponent } from './register/register.component';
import { HomeComponent } from './home/home.component';
import { from } from 'rxjs';
import { AuthService } from './auth.service';
import { PartenairelistComponent } from './partenaire/partenairelist/partenairelist.component';
import { PartenaireService } from './service/partenaire.service';
import { PartenaireComponent } from './partenaire/partenaire/partenaire.component';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { TemplateComponent } from './template/template.component';
import { RegisterformeComponent } from './registerforme/registerforme.component';
import { PartenaireformeComponent } from './partenaireforme/partenaireforme.component';



@NgModule({
  declarations: [
    AppComponent,
    NavComponent,
    LoginComponent,
    RegisterComponent,
    HomeComponent,
    PartenairelistComponent,
    PartenaireComponent,
    TemplateComponent,
    RegisterformeComponent,
    PartenaireformeComponent

  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    FormsModule,
    HttpClientModule,
    CommonModule,
    BrowserAnimationsModule

  ],
  providers: [AuthService, PartenaireService],
  bootstrap: [AppComponent]
})
export class AppModule { }
