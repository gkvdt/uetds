var express = require('express');
var router = express.Router();
var get = require('../helpers/get');
var soap = require('soap');
var serviceUrl = require('../config/serviceUrl');

router.post('/', function (req, res, next) {
  soap.createClient(serviceUrl, function (err, client) {
        if (err) {
      res.send(err)
    }


    client.setSecurity(new soap.BasicAuthSecurity(req.body.wsuser.kullaniciAdi, req.body.wsuser.sifre));
    client.paramTehlikeliMaddeTasimaSekli(req.body, function (err, result) {
      if (err) {
        res.send(err)
      } else {
        res.send(result)
      }
    });
  })
});

module.exports = router;
