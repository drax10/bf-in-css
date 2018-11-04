var Handlebars = require('handlebars');
var fs = require('fs');

Handlebars.registerHelper( 'add', (a,b) => a+b );
Handlebars.registerHelper( 'isEqual', (a,b) => a===b );

var source = fs.readFileSync('./index.hbs', 'utf8');
var template = Handlebars.compile(source);

var config = require('./config');
var html = template(config);

// Strip unnecesary whitespace from html
html = html.replace(/\n[ \t]*/g, "");

fs.writeFile(
  "./public/index.html",
  html,
  err => err ? console.log(err) : "Saved with no errors!"
);
