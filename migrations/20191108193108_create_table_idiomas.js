
exports.up = function(knex) {
    return knex.schema.createTable('idiomas', table => {
        table.increments('idioma').primary()
        table.string('descricao')
        table.string('nivel')
    })
  };
  
  exports.down = function(knex) {
      return knex.schema.dropTable('idiomas')
  };
  