
exports.up = function(knex) {
    return knex.schema.alterTable('dadosPessoais', table => {
        table.integer('usuario').notNullable()
    })
};

exports.down = function(knex) {
    return knex.schema.alterTable('dadosPessoais', table => {
        table.dropColumn('usuario')
    })
};
