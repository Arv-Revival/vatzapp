import React from "react";
import { Button, Col, Container, Form, Row } from "react-bootstrap";
import { Link } from "react-router-dom";

import Background404 from "../../../assets/images/404.png";

const NotFound404 = () => {
  return (
    <React.Fragment>
      <div className="auth-wrapper maintenance">
        <Container>
          <Row className="justify-content-center">
            <Col md={8} className="text-center px-4">
              <div>
                <img
                  src={Background404}
                  alt="404 - Page Not Found"
                  style={{ maxWidth: 350 }}
                />
              </div>
              <h3 className="text-primary mt-4">Oops! Page not found!</h3>
            </Col>
          </Row>
        </Container>
      </div>
    </React.Fragment>
  );
};

export default NotFound404;
