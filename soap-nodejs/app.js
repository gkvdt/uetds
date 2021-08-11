var createError = require('http-errors');
var express = require('express');
var path = require('path');
var cookieParser = require('cookie-parser');
var logger = require('morgan');

var indexRouter = require('./routes/index');
var ipListeleRouter = require('./routes/ipListele');
var ipSilRouter = require('./routes/ipSil');
var aracMuayeneSorgulaRouter = require('./routes/aracMuayeneSorgula');
var iptalTurleriRouter = require('./routes/iptalTurleri')
var ipTanimlaRouter = require('./routes/ipTanimla');
var meslekiYeterlilikSorgulaRouter = require('./routes/meslekiYeterlilikSorgula');
var paramTehlikeliMaddeTasimaSekliRouter = require('./routes/paramTehlikeliMaddeTasimaSekli');
var paramYukBirimiRouter = require('./routes/paramYukBirimi');
var paramYukTuruRouter = require('./routes/paramYukTuru');
var yeniYukKaydiBildirV2Router = require('./routes/yeniYukKaydiBildirV2');
var seferIptalEtRouter = require('./routes/seferIptalEt');
var seferAktifEtRouter = require('./routes/seferAktifEt');
var seferBildirimOzetiRouter = require('./routes/seferBildirimOzeti');
var seferBildirimRaporuRouter = require('./routes/seferBildirimRaporu');
var sefereYukEkleRouter = require('./routes/sefereYukEkle');
var seferGuncelleRouter = require('./routes/seferGuncelle');
var yukBildirimiDetayiV2Router = require('./routes/yukBildirimiDetayiV2');
var yukBildirimiGuncelleV2Router = require('./routes/yukBildirimiGuncelleV2');
var yetkiBelgesiKontrol = require('./routes/yetkiBelgesiKontrol')
var vizeOnBasvuruSurucuEkle = require('./routes/vizeOnBasvuruSurucuEkle')
var paramTasimaTurleri = require('./routes/paramTasimaTurleri')
var yeniSeferEkleV3 = require('./routes/yeniSeferEkleV3')



var app = express();


app.use(logger('dev'));
app.use(express.json());
app.use(express.urlencoded({ extended: false }));
app.use(cookieParser());

app.use('/ipListele', ipListeleRouter);
app.use('/ipSil', ipSilRouter);
app.use('/aracMuayeneSorgula',aracMuayeneSorgulaRouter)
app.use('/iptalTurleri',iptalTurleriRouter)
app.use('/ipTanimla',ipTanimlaRouter)
app.use('/meslekiYeterlilikSorgula',meslekiYeterlilikSorgulaRouter)
app.use('/paramTehlikeliMaddeTasimaSekli',paramTehlikeliMaddeTasimaSekliRouter)
app.use('/paramYukBirimi',paramYukBirimiRouter)
app.use('/paramYukTuru',paramYukTuruRouter)
app.use('/yeniYukKaydiBildirV2',yeniYukKaydiBildirV2Router)
app.use('/seferIptalEt',seferIptalEtRouter)
app.use('/seferAktifEt',seferAktifEtRouter)
app.use('/seferBildirimOzeti',seferBildirimOzetiRouter)
app.use('/seferBildirimRaporu',seferBildirimRaporuRouter)
app.use('/sefereYukEkle',sefereYukEkleRouter)
app.use('/seferGuncelle',seferGuncelleRouter)
app.use('/yukBildirimiDetayiV2',yukBildirimiDetayiV2Router)
app.use('/yukBildirimiGuncelleV2',yukBildirimiGuncelleV2Router)
app.use('/yetkiBelgesiKontrol',yetkiBelgesiKontrol)
app.use('/vizeOnBasvuruSurucuEkle',vizeOnBasvuruSurucuEkle)
app.use('/paramTasimaTurleri',paramTasimaTurleri);
app.use('/yeniSeferEkleV3',yeniSeferEkleV3);





// catch 404 and forward to error handler
app.use(function(req, res, next) {
  next(createError(404));
});

// error handler
app.use(function(err, req, res, next) {
  // set locals, only providing error in development
  res.locals.message = err.message;
  res.locals.error = req.app.get('env') === 'development' ? err : {};

  // render the error page
  res.status(err.status || 500);
  res.render('error');
});

module.exports = app;
