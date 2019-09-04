import { Component, OnInit } from '@angular/core';
import { AuthService } from '../auth.service';
import { PartenaireService } from '../service/partenaire.service';

@Component({
  selector: 'app-partenaireforme',
  templateUrl: './partenaireforme.component.html',
  styleUrls: ['./partenaireforme.component.scss']
})

export class PartenaireformeComponent implements OnInit {
  imageUrl: string = "/assets/img/contact.png"


  partUserData = { imageName: File = null };

  constructor(private auth: PartenaireService) { }
  

  ngOnInit() {
  }
  handleFileInput(file: FileList) {

    this.partUserData.imageName = file.item(0);
    var reader = new FileReader();
    reader.onload = (event: any) => {
      this.imageUrl = event.target.result
    };
    reader.readAsDataURL(this.partUserData.imageName);
  }
  partUser() {
    console.log(this.partUserData);
    this.auth.partUser(this.partUserData)
      .subscribe(
        res => {
          console.log(res);
        },
        err => console.log(err)
      );
  }

}
