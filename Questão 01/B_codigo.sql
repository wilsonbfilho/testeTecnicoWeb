SELECT
    CL.id_cliente,
    CL.nome_cliente AS Nome,
    CL.rg_cliente AS RG,
    CL.telmask_cliente AS Telefone,
    CL.email_cliente AS Email,
    COUNT(C.id_compra) AS QuantidadeCompras,
    CF.url_foto AS CaminhoFotoPerfil
FROM
    compras C
JOIN
    clientes CL ON C.fk_id_cliente_clientes = CL.id_cliente
JOIN
    clientes_fotos CF ON CL.id_cliente = CF.fk_id_cliente_clientes AND CF.ordem_foto = 1
WHERE
    C.sel_status_compra = 'concluido'
GROUP BY
    CL.id_cliente, CL.nome_cliente, CL.rg_cliente, CL.telmask_cliente, CL.email_cliente, CF.url_foto;