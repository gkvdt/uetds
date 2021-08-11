/*
var express = require('express');
var router = express.Router();
var get = require('../helpers/get');
var args = { testMsj: get("qwdwq") };
var soap = require('soap');
var serviceUrl = require('../config/serviceUrl');

router.get('/',  function (req, res, next) {
    res.send(req.query);
    soap.createClient(serviceUrl, function (err, client) {
        client.setSecurity(new soap.BasicAuthSecurity('999999', '999999testtest'));
        client.servisTest(args, function (err, result) {
            if (err) {
                res.send(err)
            } else {
                res.send(result)
            }
        });
    })


});

module.exports = router;

*/



var express = require('express');
var router = express.Router();
var get = require('../helpers/get');
var soap = require('soap');
var serviceUrl = require('../config/serviceUrl');

const helper = (endPoint,callback) =>  {
    return router.post(`/${endPoint}`, function (req, res, next) {
        soap.createClient(serviceUrl, function (err, client) {
            client.setSecurity(new soap.BasicAuthSecurity(req.body.wsuser.kullaniciAdi, req.body.wsuser.sifre));
            if (err) {
                res.send(err)
            }
             res.send(callback(client,res))

        })
    })
}

function handleFunction(client) {
    client.ipListele(req.body, function (err, result) {
        if (err) {
            return (err)
        } else {
            return (result)
        }
    });
}


const indexRouter = () => {
   return helper('/',(client,res)=>{
        client.servisTest({},function(err,result){
            if (err) return err;
            return result
        })
    })
}

module.exports = indexRouter;
