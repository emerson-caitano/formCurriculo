
exports.up = function(knex) {
    return knex.schema.createTable('certificados', table => {
        table.increments('certificado').primary()
        table.string('descricao')
        table.string('link')
    })
  };
  
  exports.down = function(knex) {
      return knex.schema.dropTable('certificados')
  };
  