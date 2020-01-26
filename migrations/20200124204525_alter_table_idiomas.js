
exports.up = function(knex) {
    return knex.schema.alterTable('idiomas', table => {
        table.integer('usuario').notNullable()
    })
};

exports.down = function(knex) {
    return knex.schema.alterTable('idiomas', table => {
        table.dropColumn('usuario')
    })
};
