
exports.up = function(knex) {
    return knex.schema.createTable('usuarios', table => {
        table.increments('usuario').primary()
        table.string('email')
        table.string('password')
    })
  };
  
  exports.down = function(knex) {
      return knex.schema.dropTable('usuarios')
  };
  