
exports.up = function(knex) {
    return knex.schema.alterTable('competencias', table => {
        table.integer('usuario').notNullable()
    })
};

exports.down = function(knex) {
    return knex.schema.alterTable('competencias', table => {
        table.dropColumn('usuario')
    })
};
