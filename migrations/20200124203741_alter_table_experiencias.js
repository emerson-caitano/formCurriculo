
exports.up = function(knex) {
    return knex.schema.alterTable('experiencias', table => {
        table.integer('usuario').notNullable()
    })
};

exports.down = function(knex) {
    return knex.schema.alterTable('experiencias', table => {
        table.dropColumn('usuario')
    })
};
