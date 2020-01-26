
exports.up = function(knex) {
    return knex.schema.alterTable('formacoesAcademicas', table => {
        table.integer('usuario').notNullable()
    })
};

exports.down = function(knex) {
    return knex.schema.alterTable('formacoesAcademicas', table => {
        table.dropColumn('usuario')
    })
};
