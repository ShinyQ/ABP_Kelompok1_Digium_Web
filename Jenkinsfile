pipeline {
  agent any
  stages {
    stage("verify tooling") {
      steps {
        sh '''
          docker version
          docker info
          docker compose version
          curl --version
          git version
        '''
      }
    }
    stage('start container') {
      environment {
          SECRET = credentials('p-digium-sevice')
      }
      steps {
        sh 'cp -p $SECRET $WORKSPACE'
        sh 'docker compose up --build -d --no-color --wait'
        sh 'docker compose ps'
      }
    }
    stage("docker image clean up") {
      steps {
        sh 'docker image prune -f'
      }
    }
  }
  post {
    always {
      sh 'rm .env'
    }
  }
}
