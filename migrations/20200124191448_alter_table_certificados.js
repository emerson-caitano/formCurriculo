
exports.up = function(knex) {
    return knex.schema.alterTable('certificados', table => {
        table.integer('usuario').notNullable()
    })
};

exports.down = function(knex) {
    return knex.schema.alterTable('certificados', table => {
        table.dropColumn('usuario')
    })
};
