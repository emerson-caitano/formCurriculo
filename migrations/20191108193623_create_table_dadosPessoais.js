
exports.up = function(knex) {
    return knex.schema.createTable('dadosPessoais', table => {
        table.increments('dadoPessoal').primary()
        table.string('nome')
        table.string('titulo')
        table.string('estado',2) //Estado, Endereço
    })
  };
  
  exports.down = function(knex) {
      return knex.schema.dropTable('dadosPessoais')
  };
  