import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { tap } from 'rxjs/operators';
import { JwtHelperService } from '@auth0/angular-jwt';
import { THIS_EXPR } from '@angular/compiler/src/output/output_ast';


@Injectable({
  providedIn: 'root'
})
export class AuthService {

  private loginUrl = "http://127.0.0.1:8000/api/login"
  private profilUrl = "http://127.0.0.1:8000/api/liste"
  jwt: string;
  username: string;
  roles: Array<string>;
  constructor(private http: HttpClient) { }


  loginUser(user: {}) {
    return this.http.post<any>(this.loginUrl, user).pipe(tap(res => {

      localStorage.setItem('token', res.access_token)
      console.log(user);
    }));
  }
  getToken() {
    return localStorage.getItem('token');
  }
  loggedIn() {
    return !!localStorage.getItem('token');
  }
  registerUser(user: { imageName?: any; username?: any; password?: any; libelle?: any; nom?: any; adresse?: any; prenom?: any; email?: any; telephone?: any; cni?: any; statut?: any; }) {
    const endpoint = 'http://127.0.0.1:8000/api/register'
    const formData: FormData = new FormData();
    console.log(user.username);
    formData.append('imageName', user.imageName);
    formData.append("username", user.username);
    formData.append('password', user.password);
    formData.append('libelle', user.libelle);
    formData.append('nom', user.nom);
    formData.append('adresse', user.adresse);
    formData.append('prenom', user.prenom);
    formData.append('email', user.email);
    formData.append('telephone', user.telephone);
    formData.append('cni', user.cni);
    formData.append('statut', user.statut);

    const heades = new HttpHeaders().set("Authorization", "Bearer " + localStorage.getItem('token'));
    return this.http.post(endpoint, formData, { headers: heades });

  }
  getprofil() {
    const header = new HttpHeaders().set("Authorization", "Bearer " + localStorage.getItem('token'));

    return this.http.get<any>(this.profilUrl, { headers: header });
  }

  parseTWT() {
    let jwtHelper = new JwtHelperService();
    let objJWT = jwtHelper.decodeToken(this.jwt);
    this.username = objJWT.obj;
    this.roles = objJWT.roles;
    console.log(this.roles);
  }
  isAdmin() {
    return this.roles.indexOf('ROLE_SUPERADMIN') >= 0;
  }
  isUser() {
    return this.roles.indexOf('ROLE_USER') >= 0;
  }
  isAuthenticated() {
    return this.roles;
  }
  loadToken() {
    this.jwt = localStorage.getItem('token');
    this.parseTWT();

  }
  ROles() {
    return this.roles;
  }
  logOut() {
    localStorage.removeItem('token');
    this.initParams();
  }
  initParams() {
    this.jwt = undefined;
    this.username = undefined;
    this.roles = undefined;
  }
}
