pipeline {
    agent any

    stages {
        stage('Clonar projeto') {
            steps {
                git branch: 'main', url: 'https://github.com/FelipeRBDantas/donors-backend.git'
            }
        }
        stage('Criar o arquivo .env') {
            steps {
                powershell 'cp .env.example .env'
            }
        }
        stage('Iniciar o container') {
            steps {
                powershell 'docker-compose up -d'
            }
        }
        stage('Executar o bash') {
            steps {
                powershell 'docker-compose exec -it donors_backend bash'
            }
        }
        stage('Instalar dependências') {
            steps {
                powershell 'composer install'
            }
        }
        stage('Gerar a chave') {
            steps {
                powershell 'php artisan key:generate'
            }
        }
        stage('Pausa o serviço') {
            steps {
                powershell 'docker-compose stop'
            }
        }
    }
}
