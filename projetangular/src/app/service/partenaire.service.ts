import { Injectable } from '@angular/core';
import { HttpHeaders, HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class PartenaireService {
 
 
  

  constructor(private http: HttpClient) { }
  partUser(user) {
    const endpoint = 'http://127.0.0.1:8000/api/partenairewari';
    const formData: FormData = new FormData();
    console.log(user.nomEntreprise);
    formData.append('nomentreprise', user.nomentreprise);
    formData.append('registreCommerce', user.registreCommerce);
    formData.append('raisonSociale', user.raisonSociale);
    formData.append('adresse', user.adresse);
    formData.append('username', user.username);
    formData.append('password', user.password);
    formData.append('prenom', user.prenom);
    formData.append('nom', user.nom);
    formData.append('email', user.email);
    formData.append('telephone', user.telephone);
    formData.append('cni', user.cni);
    formData.append('statut', user.statut);
    formData.append('imageName', user.imageName);



    const heades = new HttpHeaders().set("Authorization", "Bearer "+ localStorage.getItem('token'));
    return this.http.post(endpoint, formData, { headers: heades });
  }
}
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
  

  
 