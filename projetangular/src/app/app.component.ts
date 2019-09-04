import { Component,OnInit } from '@angular/core';
import { AuthService } from './auth.service';


@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent implements OnInit {
 
  title = 'projetangular';

  constructor(private _auth:AuthService){};
  ngOnInit(): void {
    this._auth.loadToken();
    //throw new Error("Method not implemented.");
  }

  isAdmin(){
    return this._auth .isAdmin();
  }
  isUser(){
    return this._auth.isUser();
  }
 isAuthenticated(){
   return this._auth.isAuthenticated();
 }
 LogOut(){
   this._auth.logOut();
 }
}
