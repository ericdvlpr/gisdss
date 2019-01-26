Package.describe({
  name: 'dangrossman:bootstrap-daterangepicker',
<<<<<<< HEAD
  version: '2.1.27',
=======
  version: '2.1.25',
>>>>>>> 348c139e2bbd18748e499cc4d7f20e1f2b097a4b
  summary: 'Date range picker component for Bootstrap',
  git: 'https://github.com/dangrossman/bootstrap-daterangepicker',
  documentation: 'README.md'
});

Package.onUse(function(api) {
  api.versionsFrom('METEOR@0.9.0.1');

  api.use('twbs:bootstrap@3.3.4', ["client"], {weak: true});
  api.use('momentjs:moment@2.10.3', ["client"]);
  api.use('jquery@1.11.3_2', ["client"]);

  api.addFiles('daterangepicker.js', ["client"]);
  api.addFiles('daterangepicker.css', ["client"]);
});
