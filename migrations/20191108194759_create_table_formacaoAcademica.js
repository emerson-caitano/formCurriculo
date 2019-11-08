
exports.up = function(knex) {
    return knex.schema.createTable('formacoesAcademicas', table => {
        table.increments('formacaoAcademica').primary()
        table.string('instituicao')
        table.string('curso')
        table.string('areaAcademica')
        table.date('dataInicial')
        table.date('dataFinal')
    })
  };
  
  exports.down = function(knex) {
      return knex.schema.dropTable('formacoesAcademicas')
  };
  