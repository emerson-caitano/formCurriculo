
exports.up = function(knex) {
  return knex.schema.createTable('contatos', table => {
      table.increments('contato').primary()
      table.string('url')
      table.string('descricao')
  })
};

exports.down = function(knex) {
    return knex.schema.dropTable('contatos')
};
