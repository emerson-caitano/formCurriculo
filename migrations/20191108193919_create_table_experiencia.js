
exports.up = function(knex) {
    return knex.schema.createTable('experiencias', table => {
        table.increments('experiencia').primary()
        table.string('empresa')
        table.string('cargo')
        table.date('dataInicial')
        table.date('dataFinal')
        table.string('localizacao')
        table.text('funcoes')
    })
  };
  
  exports.down = function(knex) {
      return knex.schema.dropTable('experiencias')
  };
  