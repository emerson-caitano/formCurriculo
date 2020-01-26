
exports.up = function(knex) {
    return knex.schema.alterTable('contatos', table => {
        table.integer('email').notNullable()
        table.integer('celular').notNullable()
        table.integer('whatsapp').notNullable()
        table.integer('linkedin').notNullable()
        table.integer('github').notNullable()
        table.integer('telegram').notNullable()
        table.integer('usuario').notNullable()
    })
};

exports.down = function(knex) {
    return knex.schema.alterTable('contatos', table => {
        table.dropColumn('email')
        table.dropColumn('celular')
        table.dropColumn('whatsapp')
        table.dropColumn('linkedin')
        table.dropColumn('github')
        table.dropColumn('telegram')
        table.dropColumn('usuario')
    })
};