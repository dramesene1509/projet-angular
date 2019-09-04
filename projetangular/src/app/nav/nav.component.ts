import { Component, OnInit } from '@angular/core';
import { AuthService } from '../auth.service';
import {Router } from '@angular/router';





@Component({
  selector: 'app-nav',
  templateUrl: './nav.component.html',
  styleUrls: ['./nav.component.scss']
})
export class NavComponent implements OnInit {



  constructor(private _auth:AuthService,private _router:Router) { }

  ngOnInit() {
  }
  isAuthenticated(){
    return this._auth.ROles();
  }
  LogOut(){
    this._auth.logOut();
  }
  isAdmin(){
    return this._auth .isAdmin();
  }
  isUser(){
    return this._auth.isUser();
  }

}
