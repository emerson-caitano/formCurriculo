exports.seed = function(knex) {
  // Deletes ALL existing entries
  return knex('certificados').del()
    .then(function () {
      // Inserts seed entries
      return knex('certificados').insert([
        {
          descricao: "Certificado Formação Ensino", 
          link: "http://www.certificado.com/12345", 
          usuario: 1
        },
        {
          descricao: "Certificado Graduação Técnologica",
          link: "http://www.cert.com/54321",
          usuario: 1
        },
      ]);
    });
};