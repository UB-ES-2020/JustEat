# This is a basic workflow to help you get started with Actions

name: CD

# Controls when the action will run. Triggers the workflow on push or pull request
# events but only for the main branch
on:
  push:
    branches: [ main, develop ]

# A workflow run is made up of one or more jobs that can run sequentially or in parallel
jobs:
  deploy-production:
    name: Deploy Project to PRODUCTION Server
    runs-on: ubuntu-latest
    if: github.ref == 'refs/heads/main'
    steps:
      - uses: actions/checkout@v1
      - name: Setup PHP
        uses: shivammathur/setup-php@master
        with:
          php-version: 7.4
          extension-csv: mbstring, bcmath
      - name: Composer install
        run: composer install -q --no-ansi --no-interaction --no-scripts --no-suggest --no-progress --prefer-dist
      - run: mkdir -p ~/.ssh
      - run: echo "${{ secrets.SSH_PRIVATE_KEY }}" >> ~/.ssh/deploy_justeat
      - run: echo -e "Host *\n\tStrictHostKeyChecking no\n\n" > ~/.ssh/config
      - run: echo -e "Host deploy.justeat.xavidejuan.com \n\tHostName ${{ secrets.PRODUCTION_IP }}" >> ~/.ssh/config
      - run: chmod 600 ~/.ssh/deploy_justeat
      - run: chmod 600 ~/.ssh/config
      - name: Deploy to PRODUCTION Server
        run: vendor/bin/deploy production -vvv
  deploy-staging:
    name: Deploy Project to STAGING Server
    runs-on: ubuntu-latest
    if: github.ref == 'refs/heads/develop'
    steps:
      - uses: actions/checkout@v1
      - name: Setup PHP
        uses: shivammathur/setup-php@master
        with:
          php-version: 7.4
          extension-csv: mbstring, bcmath
      - name: Composer install
        run: composer install -q --no-ansi --no-interaction --no-scripts --no-suggest --no-progress --prefer-dist
      - run: mkdir -p ~/.ssh
      - run: echo "${{ secrets.SSH_PRIVATE_KEY }}" >> ~/.ssh/deploy_justeat
      - run: echo -e "Host *\n\tStrictHostKeyChecking no\n\n" > ~/.ssh/config
      - run: echo -e "Host deploy.staging.justeat.xavidejuan.com \n\tHostName ${{ secrets.STAGING_IP }}" >> ~/.ssh/config
      - run: chmod 600 ~/.ssh/deploy_justeat
      - run: chmod 600 ~/.ssh/config
      - name: Deploy to PRODUCTION Server
        run: vendor/bin/deploy staging -vvv
