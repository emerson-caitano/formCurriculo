// Update with your config settings.

module.exports = {
    client: 'mysql2',
    connection: {
      database: 'curriculo',
      user:     'root',
      password: '12345'
    },
    pool: {
      min: 2,
      max: 10
    },
    migrations: {
      tableName: 'knex_migrations'
    }

};
