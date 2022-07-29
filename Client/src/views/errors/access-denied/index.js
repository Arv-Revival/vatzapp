import React from "react";
import { Col, Container, Row } from "react-bootstrap";

import AccessDeniedImg from "../../../assets/images/access-denied.png";

const Construction = () => {
  return (
    <React.Fragment>
      <div className=" maintenance">
        <Container>
          <Row className="justify-content-center">
            <Col md={8} className="text-center px-4">
              <div className="mt-5">
                <img
                  src={AccessDeniedImg}
                  alt="Access Denied"
                  style={{ maxWidth: 300 }}
                />
              </div>
              <h2 className="text-danger mt-4">Access Denied..!</h2>
            </Col>
          </Row>
        </Container>
      </div>
    </React.Fragment>
  );
};

export default Construction;
