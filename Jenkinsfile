pipeline {
    agent any

    environment {
        // Set any environment variables here
        DEPLOY_DIR = '/var/www/laracrud'  // Change to your deployment directory
        SSH_KEY = credentials('your-ssh-credentials-id')  // Use Jenkins credentials for SSH access
    }

    stages {
        stage('Clone Repository') {
            steps {
                // Clone your Git repository
                git branch: 'main', url: 'git@github.com:skyrizer/laracrud.git'
            }
        }
        
        stage('Install Dependencies') {
            steps {
                // Run composer install to install PHP dependencies
                sh 'composer install --no-interaction --prefer-dist --optimize-autoloader'
            }
        }

        stage('Environment Setup') {
            steps {
                // Copy environment variables to the deployment directory
                sh 'cp .env.example .env'
                sh 'php artisan key:generate'
            }
        }

        stage('Run Migrations') {
            steps {
                // Run Laravel database migrations
                sh 'php artisan migrate --force'
            }
        }

        stage('Deploy to Server') {
            steps {
                script {
                    // SSH into your server and deploy the Laravel project
                    sshagent([SSH_KEY]) {
                        sh """
                            rsync -avz --exclude='vendor' --exclude='.git' ./ ${DEPLOY_DIR}
                            cd ${DEPLOY_DIR}
                            composer install --no-dev --optimize-autoloader
                            php artisan config:cache
                            php artisan route:cache
                            php artisan view:cache
                        """
                    }
                }
            }
        }
        
        stage('Post-Deploy Tasks') {
            steps {
                // Perform any post-deployment tasks, such as clearing caches
                sh 'php artisan cache:clear'
                sh 'php artisan config:clear'
            }
        }
    }

    post {
        success {
            echo 'Deployment successful!'
        }
        failure {
            echo 'Deployment failed!'
        }
    }
}
