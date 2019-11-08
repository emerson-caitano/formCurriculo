
exports.up = function(knex) {
    return knex.schema.createTable('competencias', table => {
        table.increments('competencia').primary()
        table.string('descricao')
    })
  };
  
  exports.down = function(knex) {
      return knex.schema.dropTable('competencias')
  };
  