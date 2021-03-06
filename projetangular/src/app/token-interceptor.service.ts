import { Injectable } from '@angular/core';
 import {HttpInterceptor} from '@angular/common/http'
import { from } from 'rxjs';
@Injectable(
 
)
export class TokenInterceptorService implements HttpInterceptor {

  constructor() { }
  intercept(req, next) {
    let tokenizedReq = req.clone({
      setHeaders:{
        Authorization: 'Bearer xx.yy.zz'
      }
    })
    return next.handle(tokenizedReq)
  }

}
