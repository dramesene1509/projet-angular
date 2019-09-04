import { Component, OnInit } from '@angular/core';
import { AuthService } from '../auth.service';

@Component({
  selector: 'app-registerforme',
  templateUrl: './registerforme.component.html',
  styleUrls: ['./registerforme.component.scss']
})
export class RegisterformeComponent implements OnInit {

 
  imageUrl: string = "/assets/img/contact.png"
  listprofil: any;

  registerUserData = { imageName: File = null };
  constructor(private auth: AuthService) { }
  ngOnInit() {
    this.auth.getprofil().subscribe(
      res => { this.listprofil = res }

      //err => console.log(err)
    );
  }

  handleFileInput(file: FileList) {

    this.registerUserData.imageName = file.item(0);
    var reader = new FileReader();
    reader.onload = (event: any) => {
      this.imageUrl = event.target.result
    };
    reader.readAsDataURL(this.registerUserData.imageName);
  }

  registerUser() {
    console.log(this.registerUserData);
    this.auth.registerUser(this.registerUserData)
      .subscribe(
        res => {
          console.log(res);
        },
        err => console.log(err)
      );
  }

}
