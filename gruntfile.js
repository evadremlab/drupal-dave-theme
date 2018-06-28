module.exports = function (grunt) {
    "use strict";
      grunt.initConfig({
          pkg: grunt.file.readJSON('package.json'),
          sass: {
            dev: {
                options: {
                    outputStyle: 'expanded'
                },
                files: {
                    './css/style.css': './sass/style.scss',
                }
                }
            },
            watch: {
                css: {
                    files: ['./sass/**/*.scss'],
                    tasks: ['sass:dev'],
                },
                livereload: {
                    files:[
                        './css/*.css',
                    ]
                }
            },
          cssmin: {
            my_target: {
                files: [{
                    expand: true,
                    cwd: 'css/',
                    src: ['*.css', '!*.min.css'],
                    dest: 'css/',
                    ext: '.min.css'
                }]
            }
          },
          uglify: {
            my_target: {
                files: {
                    './js/theme.min.js': './js/theme.js'
                }
            }

          },
      });

      // Load tasks...
      grunt.loadNpmTasks('grunt-sass');
      grunt.loadNpmTasks('grunt-contrib-watch');
      grunt.loadNpmTasks('grunt-contrib-uglify');
      grunt.loadNpmTasks('grunt-contrib-cssmin');

      // Default task.
      grunt.registerTask('default', ['sass', 'cssmin', 'watch'] );
  };
