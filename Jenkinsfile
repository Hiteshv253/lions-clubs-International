pipeline {
      agent any
      environment {
          COMPOSER_HOME = '/var/lib/jenkins/.composer'
      }
      stages {
          stage('Checkout') {
              steps {
                  git branch: 'main', url: 'https://github.com/Hiteshv253/lions-clubs-International.git'
              }
          }
          stage('Install Dependencies') {
              steps {
                  sh 'composer install'
              }
          }
          stage('Run Tests') {
              steps {
                  sh 'php artisan serve --port=9090'
              }
          }
          stage('Deploy') {
              steps {
                  sh 'php artisan key:generate'
                  sh 'php artisan migrate:refresh --seed'
                  sh 'php artisan optimize:clear'

              }
          }
      }
      post {
          success {
              echo 'Build, tests, and deployment were successful.'
          }
          failure {
              echo 'Build or tests failed.'
          }
      }
  }